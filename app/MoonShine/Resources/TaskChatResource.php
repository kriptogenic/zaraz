<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Enums\MessageStatus;
use App\Models\TaskChat;

use MoonShine\Laravel\Enums\Ability;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Number;

/**
 * @extends ModelResource<TaskChat>
 */
class TaskChatResource extends ModelResource
{
    protected string $model = TaskChat::class;

    protected string $title = 'TaskChats';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            Number::make('Chat ID'),
            Enum::make('Status')->attach(MessageStatus::class),
            Enum::make('Prefetch status')->attach(MessageStatus::class),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param TaskChat $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    protected function isCan(Ability $ability): bool
    {
        return match ($ability) {
            Ability::CREATE => false,
            default => true,
        };
    }
}
