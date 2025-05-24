<?php

namespace APP\Enum;

enum UserRoleEnum: int {
	case ADMIN = 1;
	case REGULAR = 2;
	case GUEST = 3;
}
