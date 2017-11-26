<?php

namespace Blogger\BlogBundle\Controller;

use Blogger\BlogBundle\Entity\Records;
use Blogger\BlogBundle\Entity\Pays;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AjaxController extends Controller
{
    public function indexAction(Request $request)
    {
        /**
         * № платежа, Дата платежа, Основной долг, проценты, общая сумма, остаток долга Вид платежа - аннуитетный.
         * История подсчетов и график платежей сохраняются в MySQL для последующего анализа.
         */
        if ($request->request->get('summField') &&
            $request->request->get('periodField') &&
            $request->request->get('firstPayField') &&
            $request->request->get('percField')
        ) {
            $record = new Records();
            $record->setSumm($request->request->get('summField'));
            $record->setPeriod($request->request->get('periodField'));
            $record->setFirstPay($request->request->get('firstPayField'));
            $record->setPercents($request->request->get('percField'));
            $record->setCreated(time());

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($record);
            $em->flush();
            $summ = $request->request->get('summField');
            $perc_by_year = $request->request->get('percField');
            $months = $request->request->get('periodField');
            $pl = round(($summ*($perc_by_year/(12*100)))/(1-pow((1+($perc_by_year/(12*100))), -1*$months)), 2);
            $pay_table = array();
            $ost = $summ;
            for ($i = 1; $i <= $months; $i++) {
                if (empty($date)) {
                    $date = $request->request->get('firstPayField');
                } else {
                    $date = date('d-m-Y', strtotime($date." +1 month"));
                }

                $pay_table[$i]['date'] = $date;
                $pay_table[$i]['m'] = $i;
                $pay_table[$i]['pay'] = $pl;
                $pay_table[$i]['perc'] = round($ost/$months*($perc_by_year/100), 2);
                $pay_table[$i]['osn'] = round($pl-$pay_table[$i]['perc'], 2);
                $ost = round($ost-$pay_table[$i]['osn'], 2);
                if ($i == $months) {
                    $pay_table[$i]['osn'] = $pay_table[$i]['osn']+$ost;
                    $ost = 0;
                }
                $pay_table[$i]['ost'] = $ost;
                $pay = new Pays();
                $pay->setDate($pay_table[$i]['date']);
                $pay->setM($pay_table[$i]['m']);
                $pay->setPay($pay_table[$i]['pay']);
                $pay->setPerc($pay_table[$i]['perc']);
                $pay->setOsn($pay_table[$i]['osn']);
                //$em = $this->getDoctrine()->getEntityManager();
                $em->persist($pay);
                $em->flush();
            }
            //make something curious, get some unbelieveable data
            return $this->render('BloggerBlogBundle:Default:pays.html.twig', array('pays' => $pay_table));
        }

        return new Response('Error!', 400);
    }
}
