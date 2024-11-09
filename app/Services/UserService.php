<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\AppService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserService extends AppService {
    protected $payload;
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
       $this->userRepository = $userRepository;
    }

    public function setPayload(array $payload)
    {
        $this->payload = $payload;
        return $this;
    }

    public function exec()
    {
        $users =$this->userRepository->search([
            'id' => '1'
        ])->first();
        
        return response()->json([
            $users 
        ]);
    }
}
