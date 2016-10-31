<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:100',
            'descricao'=> 'required|max:255',
            'valor'=>'required|numeric',
            'quantidade'=>'required|numeric',
            'tamanho' => 'required|max:100'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O nome é obrigatório',
            'descricao.required' => 'A descrição é obrigatória.', 
            'valor.required' => 'O valor da descrição é númerica',
            'quantidade.required' => 'A quantidade é númerica.',
            'tamanho.required' => 'O tamanho é obrigatório.'
        ];
    }
}
