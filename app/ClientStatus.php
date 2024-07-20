<?php

namespace App;

enum ClientStatus: int
{
    case NOT_PAID = 1;
    case PAID = 2;
}
