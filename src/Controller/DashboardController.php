<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Entity\SubjectUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/user/dashboard", name="dashboard")
     */
    public function index()
    {
        $userSubjects = $this->getDoctrine()->getRepository(SubjectUser::class)->findBy([
            'user' => $this->getUser()->getID()
        ]);

        $notes = 0;
        $subjectRemains = count($userSubjects);

        foreach ($userSubjects as $userSubject) {
            if ($userSubject->getApproved() === 'Y') {
                $subjectRemains--;
                if ($userSubject->getNote() !== null) {
                    $notes += $userSubject->getNote();
                }
            }
        }

        if ($notes > 0) {
            $notes /= (count($userSubjects) - $subjectRemains);
        }

        $average[0] = (int) $notes;
        $average[1] = ($notes - $average[0]) * 100;

        return $this->render('auth/dashboard/index.twig', [
            'userSubjects' => $userSubjects,
            'average' => $average,
            'subjectRemains' => $subjectRemains
        ]);
    }

    /**
     * @Route("/user/subjects/save", name="subjectSave")
     */
    public function subjectSave(Request $request)
    {
        $subjectNotes = $request->request->get('subjectNote');
        $subjectApproved = $request->request->get('subjectApproved');

        if (! is_array($subjectNotes) || ! is_array($subjectApproved)) {
            return $this->redirectToRoute('dashboard');
        }

        foreach (range(0, count($subjectNotes) - 1) as $k) {
            $subjectUser = $this->getDoctrine()->getRepository(SubjectUser::class)->findOneBy([
                'user' => $this->getUser()->getID(),
                'subject' => $k + 1
            ]);

            $note = (int) $subjectNotes[$k] > 10 || (int) $subjectNotes[$k] < 0 ? 0 : (int) $subjectNotes[$k];

            $subjectUser->setNote($note);
            $subjectUser->setApproved($subjectApproved[$k] === 'true' ? 'Y' : 'N');
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->redirectToRoute('dashboard');
    }
}
