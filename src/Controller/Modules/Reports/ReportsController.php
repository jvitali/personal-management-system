<?php
namespace App\Controller\Modules\Reports;

use App\Controller\Core\Application;
use App\Entity\Modules\Payments\MyPaymentsOwed;
use Doctrine\DBAL\DBALException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReportsController extends AbstractController
{

    /**
     * @var Application $app
     */
    private $app;

    public function __construct(Application $app) {
        $this->app = $app;
    }

    /**
     * This function sums up all payments from :
     *  - monthly payments
     *  - bills
     * @return array
     * @throws DBALException
     */
    public function buildPaymentsSummariesForMonthsAndYears()
    {
        return $this->app->repositories->reportsRepository->buildPaymentsSummariesForMonthsAndYears();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function fetchTotalPaymentsAmountForTypes(): array
    {
        return $this->app->repositories->reportsRepository->fetchTotalPaymentsAmountForTypes();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function fetchPaymentsForTypesEachMonth(): array
    {
        return $this->app->repositories->reportsRepository->fetchPaymentsForTypesEachMonth();
    }

    /**
     * @return MyPaymentsOwed[]
     */
    public function fetchHistoricalOwedMoney(): array
    {
        return $this->app->repositories->reportsRepository->fetchHistoricalOwedMoney();
    }

}