<?php

namespace Yab\Mint\Traits;

use Illuminate\Support\Facades\Storage;

trait HasAvatar
{
    /**
     * Modify the avatar attribute to use Gravitar if null
     *
     * @return string
     */
    public function getAvatarAttribute() : string|null
    {
        if (is_null($this->{$this->getAvatarField()})) {
            return $this->getGravatar();
        }
        return $this->getAvatarUrl($this->{$this->getAvatarField()});
    }

    /**
     * Get the avatar URL from Storage
     *
     * @param string $path
     * @return string
     */
    public function getAvatarUrl(string $path) : string
    {
        if (Storage::exists($path)) {
            return Storage::url($path);
        }
        return $path;
    }
    
    /**
     * Get the Avatar for the User using Gravatar
     *
     * @param integer $size
     * @param string $d
     * @param string $r
     * @param array $atts
     * @return string
     */
    public function getGravatar($size = 128, $d = 'mp', $r = 'g', $atts = []): string
    {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($this->{$this->getEmailField()})));
        $url .= "?s=$size&d=$d&r=$r";
        return $url;
    }

    /**
     * Get the avatar field to check
     *
     * @return string
     */
    public function getAvatarField() : string
    {
        return 'avatar_path';
    }

    /**
     * Get the email field to be used for Gravatar
     *
     * @return string
     */
    public function getEmailField(): string
    {
        return 'email';
    }
}
