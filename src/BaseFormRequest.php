<?php

// +----------------------------------------------------------------------
// | date: 2015-06-22
// +----------------------------------------------------------------------
// | BaseFormRequest.php: 后端表单验证基础
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------

namespace Yangyifan\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Yangyifan\Response\ResponseHelper;
use Yangyifan\Response\CodeHelp;

class BaseFormRequest extends FormRequest
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
		return [];
	}

    /**
     * 重写 validate 响应
     *
     * @param array $errors
     * @param object ResponseHelper
     * @return \Symfony\Component\HttpFoundation\Response|void
     */
    public function response(array $errors)
    {
        $errors = array_values($errors);

        return (new ResponseHelper(CodeHelp::NORMAL_ERROR, $errors[0][0]))->json();
    }

}
