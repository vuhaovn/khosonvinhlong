<?php
// controllers/ContactController.php
require_once 'models/Contact.php';

class ContactController
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $contacts = $this->contactModel->getAll();
        include 'views/contacts/index.php';
    }
}
