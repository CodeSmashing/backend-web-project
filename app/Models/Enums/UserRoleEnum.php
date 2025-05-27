<?php

namespace APP\Models\Enums;

enum UserRoleEnum: string {
	case ADMIN = 'admin';
	case REGULAR = 'regular';
	case GUEST = 'gust';
}
