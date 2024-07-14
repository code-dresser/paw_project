<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    const UPDATED_AT = null;

    protected $table      = 'orders';
    protected $primaryKey = 'orderID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['orderID', 'customersID', 'fullName', 'email', 'adress', 'city', 'postalCode', 'phone', 'deliveryMethod', 'paymentMethod','cart'];

    //Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';




    // Validation
    protected $validationRules      = [ ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}

