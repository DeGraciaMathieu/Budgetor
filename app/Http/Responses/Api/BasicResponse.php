<?php

namespace App\Http\Responses\Api;

use Illuminate\Contracts\Support\Responsable;

class BasicResponse implements Responsable
{
	protected $message;
	protected $code;

	public function __construct($message, int $code = 200)
	{
		$this->message = $message;
		$this->code = $code;
	}

    public function toResponse($request)
    {
        return response()->json($this->transformDatas(), $this->code);
    }

    protected function transformDatas() :array
    {
        return ['message' => $this->message];
    }
}