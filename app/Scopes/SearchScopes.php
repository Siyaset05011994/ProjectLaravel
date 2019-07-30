<?php

namespace App\Scopes;

class SearchScopes
{
      protected $model;
      protected $db_field=[];
      protected $db_data=[];

      public function __construct($model,$request,$search_parameters)
      {   $this->db_field=$search_parameters;
          $this->model="\App\Models\\".$model;
          $this->db_data=$request;
      }


      public function multipleSearch()
      {
           $result=$this->model::select();
           foreach ($this->db_field as $field):
               $result->where($field,'LIKE','%'.$this->db_data->$field.'%');
           endforeach;

           return $result->get();
//
//           $result=$result->paginate(2);
//           $result->withPath($this->db_data->fullUrl()); //axtaris neticesi geelnde pagination olanda diger sehifeleri basanda parametrleri aparmir deye butun neticeler cixirdi.
//           return $result;
      }



}