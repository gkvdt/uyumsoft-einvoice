<?php

namespace Gkvdt\UyumsoftEinvoice\Entities;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{

   protected $table= "ws_partys";

   protected $fillable = [
      'vkn',
      'user_id',
      'party_name',
      'street_name',
      'city_subdivision_name',
      'city_name',
      'country',
      'party_tax_scheme',
      'first_name',
      'family_name',
   ];
}
