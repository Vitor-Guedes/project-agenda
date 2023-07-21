<?php

namespace Guedes\Agenda\Controllers;

use Exception;
use Guedes\Agenda\Models\Contact;

class ContactController
{
    public function index()
    {
        $model = new Contact();
        $contacts = $model->getAll();

        return view('index', [
            'contacts' => $contacts
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function get(int $id)
    {
        $model = new Contact();
        $contact = $model->findById($id);

        return view('contact', [
            'contact' => $contact
        ]);
    }

    public function edit(int $id)
    {
        $model = new Contact();
        $contact = $model->findById($id);
        return view('edit', [
            'contact' => $contact
        ]);
    }

    public function store()
    {
        $name = filter_input(INPUT_POST, 'name');
        $phone = filter_input(INPUT_POST, 'phone');
        $observations = filter_input(INPUT_POST, 'observations');

        try {
            $contact = new Contact();
            $created = $contact->create([
                'name' => $name,
                'phone' => $phone,
                'observations' => $observations,
            ]);

            if ($created) {
                $_SESSION['message'] = 'Contato criado com sucesso!';
                return header("Location: " . getBaseUrl());
            }
        } catch (Exception $e) {
            $_SESSION['message'] = "Error: {$e->getMessage()}";
            header("Location: " . getBaseUrl());
        }
    }

    public function update(int $id)
    {
        $model = new Contact();
        $contact = $model->findById($id);

        if (!empty($contact)) {
            $contact['name'] = filter_input(INPUT_POST, 'name');
            $contact['phone'] = filter_input(INPUT_POST, 'phone');
            $contact['observations'] = filter_input(INPUT_POST, 'observations');

            $updated = $model->update($contact);
            if ($updated) {
                $_SESSION['message'] = 'Contato atualizado com sucesso!';
                return header("Location: " . getBaseUrl());
            }
        }

        $_SESSION['message'] = 'Contato não encontrado';
        header("Location: " . getBaseUrl());
    }

    public function delete(int $id)
    {
        $model = new Contact();
        $contact = $model->findById($id);

        if (!empty($contact)) {
            $deleted = $model->delete($id);
            if ($deleted) {
                $_SESSION['message'] = 'Contato deletado com sucesso!';
                return header("Location: " . getBaseUrl());
            }
        }
        $_SESSION['message'] = 'Contato não encontrado';
        header("Location: " . getBaseUrl());
    }

    public function setUpDb()
    {
        try {
            $connection = \Guedes\Agenda\MysqlConnection::make();
            $setup = file_get_contents(BASE_DIR . '/src/Database/db.sql');
            $connection->exec($setup);
            return "Base atualizada";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}