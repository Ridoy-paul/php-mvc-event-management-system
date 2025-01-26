<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomersModel;

class CustomersController extends BaseController
{
    private CustomersModel $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomersModel('customers');
    }

    public function index()
    {
        $allRegs = $this->customerModel->allRegs();
        $this->render('customers/index', ['allRegs' => $allRegs]);
    }

    public function add()
    {
        if (isset($_POST['submit_add_customer'])) {
            $this->customerModel->add($_POST['name'], $_POST['email']);
            $this->redirect(URL . 'customers/index');
        }

        $this->render('customers/add');
    }

    public function edit($field_id)
    {
        if ($field_id) {
            $oneReg = $this->customerModel->oneReg($field_id);

            if ($oneReg === false) {
                $error = new \Services\ErrorController();
                $error->index();
            } else {
                $this->render('customers/edit', ['oneReg' => $oneReg]);
            }
        } else {
            $this->redirect(URL . 'customers/index');
        }
    }

    public function update()
    {
        if (isset($_POST['submit_update_customer'])) {
            $this->customerModel->update($_POST['name'], $_POST['email'], $_POST['field_id']);
        }
        $this->redirect(URL . 'customers/index');
    }

    public function delete($field_id)
    {
        if ($field_id) {
            $this->customerModel->delete($field_id);
        }
        $this->redirect(URL . 'customers/index');
    }
}
