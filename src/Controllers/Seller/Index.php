<?php

namespace Controllers;

class Index extends \Core\Controller
{
  private $view = 'seller/index';

  public function __construct()
  {
    if (!isset($_SESSION['seller_id'])) {
      header('Location: /');
      exit;
    }


    $this->index();
  }

  private function index()
  {
    $sellerModel = new \Models\Seller();
    $customers = $sellerModel->getAllCustomers($_SESSION['seller_id']);
    $orders = $sellerModel->getAllOrders($_SESSION['seller_id']);
    $totalRevenue = $sellerModel->getTotalRevenue($_SESSION['seller_id']);
    $monthlyRevenue = $sellerModel->getMonthlyRevenue($_SESSION['seller_id']);
    $yearlyRevenue = $sellerModel->getYearlyRevenue($_SESSION['seller_id']);
    $ordersByStatus = $sellerModel->getOrdersByStatus($orders);

    $this->view_seller_page($this->view, [
      'orders' => $orders,
      'customers' => $customers,
      'totalRevenue' => $totalRevenue,
      'monthlyRevenue' => $monthlyRevenue,
      'yearlyRevenue' => $yearlyRevenue,
      'ordersByStatus' => $ordersByStatus,
    ]);
  }
}

$controller = new Index();