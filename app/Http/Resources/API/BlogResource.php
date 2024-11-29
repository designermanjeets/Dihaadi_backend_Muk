<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Setting;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
        $datetime = json_decode($sitesetup->value);
        return [
            'id'            => $this->id,
            'title'          => $this->title,
            'description'   => $this->description,
            'is_featured'   => $this->is_featured,
            'total_views'   => $this->total_views,
            'author_id'   => $this->author_id,
            'author_name'   => optional($this->author)->display_name,
            'author_image'=> optional($this->author)->login_type != null ? optional($this->author)->social_image : getSingleMedia(optional($this->author), 'profile_image',null),
            'status'        => $this->status,
            'attchments' => getAttachments($this->getMedia('blog_attachment')),
            'attchments_array' => getAttachmentArray($this->getMedia('blog_attachment'),null),
            'publish_date' => date("$datetime->date_format", strtotime($this->created_at)),
            'tags' => json_decode($this->tags),
            'deleted_at'        => $this->deleted_at,
            'created_at'        => $this->created_at,
        ];
    }
}
