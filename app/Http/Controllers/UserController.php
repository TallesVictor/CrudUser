<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\ModelUser;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $objUser;
    public function __construct()
    {
        $this->objUser = new ModelUser();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->objUser->all();
        return view('index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $arrPontos = [",", ".", "-"];
        $cpf = $request->cpf;
        $cpf = str_replace($arrPontos, "", $cpf);
        $user = DB::table('user')->where('cpf', $cpf)->paginate();
        if (count($user) == 0) {
            $cad = $this->objUser->create([
                'nome' => $request->nome,
                'email' => $request->email,
                'cpf' => $cpf,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                'estado' => $request->estado,
                'cidade' => $request->cidade,
                'dataNascimento' => $request->dataNascimento
            ]);
            if ($cad) {
                return redirect('Users');
            }
        } else {
            $user = $this->objUser->all();
            $erros = "Usuário já cadastrado!";
            return view("create", compact('erros'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->objUser->find($id);
        return view("create", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $arrPontos = [",", ".", "-"];
        $cpf = $request->cpf;
        $cpf = str_replace($arrPontos, "", $cpf);
        try {
            $up = $this->objUser->where(['id' => $id])->update([
                'nome' => $request->nome,
                'email' => $request->email,
                'cpf' => $cpf,
                'telefone' => $request->telefone,
                'endereco' => $request->endereco,
                'estado' => $request->estado,
                'cidade' => $request->cidade,
                'dataNascimento' => $request->dataNascimento
            ]);
            return redirect('Users');
        } catch (Exception $e) {
            $user = $this->objUser->find($id);
            $erros = "Usuário já cadastrado!";
            return view("create", compact('erros', 'user'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objUser->destroy($id);
        return ($del) ? "Sim" : "Não";
    }
}
