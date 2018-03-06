<?php

namespace Adam\Superauth\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    // User Roles
    const ROLE_SUPER_ADMIN =    1;
    const ROLE_ADMIN =          2;
    const ROLE_EDITOR =         3;
    const ROLE_USER =           4;
    const ROLE_USER_FEATURED =  5;
    const ROLE_MODERATORS = [self::ROLE_SUPER_ADMIN, self::ROLE_ADMIN, self::ROLE_EDITOR ];


    /**
     * Check this role is a moderator role
     *
     * @return bool
     */
    public function moderatorRole() {
        return in_array($this->id, self::ROLE_MODERATORS);
    }

    /**
     * get names in lower case and replace spaces with -
     *
     * @return string
     */
    public function trimmedName() {

        return strtolower(str_replace(' ', '_', $this->name));
    }
}
