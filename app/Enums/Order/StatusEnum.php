<?php

namespace App\Enums\Order;

enum StatusEnum: string
{
    case new = "Новый";
    case job = "В работе";
    case success = "Выполнен";
    case decline = "Отклонен";
}
