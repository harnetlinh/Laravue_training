<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = $request->user();
        return [
            "id" => $user->id,
            "name"=> $user->name,
            "email"=> $user->email,
            "email_verified_at" => $user->email_verified_at,
            "created_at" => $user->created_at,
            "updated_at" => $user->updated_at,
            "roles" => $user->role,
            'avatar' => 'https://scontent.fhan2-1.fna.fbcdn.net/v/t1.0-9/106748018_2731147163783044_4370046078045047035_n.jpg?_nc_cat=101&_nc_sid=09cbfe&_nc_ohc=XpBNJB7wnxsAX8AMy6L&_nc_ht=scontent.fhan2-1.fna&oh=20c7a74bb2eae61f9918ee478621a093&oe=5F605A70',
        ];
    }
}
