@extends('layouts.app')
@extends('layouts.menu')
@section('content')
<div class="wrapper">
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">            
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-5">
                                        <ul>
                                            <li style="list-style-type:none;">
                                                <h4 class="title">Lista de Crianças</h4>
                                            </li>
                                            <li style="list-style-type:none;">
                                                <p class="category">Lista de Crianças Cadastradas no Sistema</p>
                                            </li>
                                        </ul>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="content">

                                @if(session('success'))
                                    <p class="alert-success" align="center">
                                    {{session('success')}} </p>
                                @endif

                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        
                                         <thead>
                                            <tr>
                                            <th>#</th>
                                            <th style="padding-left:2%; width: 70%;">Nome</th>
                                            <th>Visualizar</th>
                                            <th>Editar</th>
                                            </tr>
                                        </thead>
                                            
                                         @foreach($childs as $child)                                                    
                                            <tbody>                                               
                                                 <td>{{$child->ID}}</td>
                                                 <td style="padding-left:2%; width: 70%";>{{$child->CRIA_NOME}}</td>
                                                 <td><a href="{{ url('/show_child', $child->ID) }}" > <i class="fa fa-eye" aria-hidden="true" style="margin-left:19%;"></i></a></td>
                                                 <td><a href="{{ url('/edit_child', $child->ID) }}" > <i class="fa fa-pencil-square-o" aria-hidden="true" style="margin-left:19%;"></i></a></td>
                                            </tr>
                                            </tbody>
                                       @endforeach
                                   </table>
                               </div>
                           </div>
                       </div> 
                   </div>                
               </div>
           </div>
       </div>
   </div>
</div>

@endsection