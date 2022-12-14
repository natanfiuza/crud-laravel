@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
    <div class="d-flex row justify-content-between">
        <h1 class="m-0 text-dark mb-4">Lista de usuários</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Usuários</li>
        </ol>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title text-bold text-lg">Usuários</h1>
            <div class="card-tools">
                <a href={{ route('usuarios.create')}} class="btn btn-success col fileinput-button dz-clickable">
                    <i class="fas fa-plus"></i>
                    <span>Novo</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-responsive table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            Id
                        </th>
                        <th style="width: 40%">
                            Nome
                        </th>
                        <th style="width: 20%">
                            e-mail
                        </th>
                        <th style="width: 20%">
                            Tipo
                        </th>

                        <th style="width: 20%">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                {{ $user->id }}
                            </td>
                            <td>
                                {{ $user->name }}

                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td class="project_progress">
                                {{ $user->typeuser->name }}
                            </td>

                            <td class="project-actions">
                                    <a class="btn btn-secondary btn-sm" href="{{ route('usuarios.edit', $user->id) }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <x-adminlte-button label="Privilegio" icon="fas fa-fingerprint"  data-toggle="modal" data-target="#modalCustom" class="bg-teal btn-sm btn_privilegios"/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
{{-- Custom --}}
<x-adminlte-modal id="modalCustom" title="Privilégios de acesso" size="lg" theme="teal"
    icon="fas fa-fingerprint" v-centered static-backdrop scrollable>
    <div style="height:300px;">Read the account policies...</div>
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Definir"/>
        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal"/>
    </x-slot>
</x-adminlte-modal>

