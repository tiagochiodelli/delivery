<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pedidoitem;

class pedido extends Model
{
    use HasFactory;

    public $table = 'pedido';

    public $timeStamps = false;
    public $updated_at = false;
    public $created_at = false;

    protected $fillable = ['CodPedidoEmpresa'];

    public function itens()
    {
        return $this->hasMany(PedidoItem::class, 'CodPedido');
    }
}

