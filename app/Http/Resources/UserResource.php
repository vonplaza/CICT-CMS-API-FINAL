<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    private $withProfile;
    public function __construct($resource, $withProfile = 'asdas')
    {

        parent::__construct($resource);
        $this->withProfile = strval($withProfile);
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        $data['profile'] = new ProfileResource($this->profile);
        return $data;
    }
}
