<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convertions extends Model
{
    protected $table = "convertion";

    protected $fillable = [
        "id",
        "userId",
        "value",
        "code",
        "type",
        "status",
        "created_at",
        "payment",
        "updated_at"
    ];

    public static function getType($type) {
        switch($type) {
            case "1": {
                $type = "Paysafercard vers paypal";
                break;
            }
            case "2": {
                $type = "Paysafercard vers IBAN";
                break;
            }
            case "3": {
                $type = "Paysafercard vers BTC";
                break;
            }
            case "4": {
                $type = "Paysafercard vers LTC";
                break;
            }
            case "5": {
                $type = "Paysafercard vers ETH";
                break;
            }
            default: {
                $type = "Paysafercard vers inconnu";
                break;
            }
        }
        return $type;
    }
    
    public static function getStatus($status) {
        switch($status) {
            case "1": {
                $status = "<span class='badge badge-warning'>Demande en attente</span>";
                break;
            }
            case "2": {
                $status = "<span class='badge badge-success'>Demande validée</span>";
                break;
            }
            case "3": {
                $status = "<span class='badge badge-danger'>Demande refusée</span>";
                break;
            }
            case "4": {
                $status = "<span class='badge badge-danger'>Carte PSC Junior</span>";
                break;
            }
            default: {
                $status = "<span class='badge badge-info'>Status inconnu</span>";
                break;
            }
        }
        return $status;
    } 
}
