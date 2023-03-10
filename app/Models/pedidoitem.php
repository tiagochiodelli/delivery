<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pedidoitem extends Model
{
    use HasFactory;

    public $table = 'pedidoitem';

    public $timeStamps = false;
    public $updated_at = false;
    public $created_at = false;

    protected $fillable = ['CodPedidoEmpresa', 'CodPedidoStatus'];
}
