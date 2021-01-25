<?php

namespace App\GraphQL\Queries;

use App\Models\TemplateFile;

class Filesbytemplate
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return TemplateFile::where('template_id', $args['template_id'])
        ->get();
    }
}
