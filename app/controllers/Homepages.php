<?php
class HomePages extends Controller
{
  // Properties, field
  private $peopleModel;

  // Constructor
  public function __construct()
  {
    $this->peopleModel = $this->model('RichestPeople');
  }
  // Table RichestPeople
  public function index()
  {
    $richestPeople = $this->peopleModel->getRichestPeople();

    $rows = '';
    foreach ($richestPeople as $value) {
      $rows .= "<tr>
                  <td>$value->MyName</td>
                  <td>$value->Networth</td>
                  <td>$value->Age</td>
                  <td>$value->Company</td>
                  <td><a href='" . URLROOT . "/richest/delete/$value->Id'>delete</a></td>
                </tr>";
    }

    $data = [
      'title' => "Homepage",
      'richestPeople' => $rows
    ];
    $this->view('homepages/index', $data);
  }
}
