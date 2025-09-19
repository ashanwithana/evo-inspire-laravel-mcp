<?php

namespace App\Mcp\Tools;

use Illuminate\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Tool;

class GetEvolutionTool extends Tool
{
    /**
     * The tool's description.
     */
    protected string $name = 'get_laravel_evolution';
    protected string $title = 'Get Laravel Evolution Insights';
    protected string $description = 'Retrieves key changes in a Laravel version and an inspirational message on progress.';

    /**
     * Handle the tool request.
     */
    public function handle(Request $request): mixed
    {
        $validated = $request->validate($this->schema(app(JsonSchema::class)));
        $version = $validated['version'];

        // Hardcoded evolution data (expand as needed)
        $evolutionData = [
            '9.x' => [
                'changes' => 'Introduced dark mode in docs, improved route caching, and Symfony 6.0 components.',
                'inspiration' => 'Like Laravel 9, embrace change to build stronger foundations—evolution fuels innovation!'
            ],
            '10.x' => [
                'changes' => 'Added Pest testing, graceful deprecation handling, and Laravel Pennant for feature flags.',
                'inspiration' => 'Version 10 reminds us: Small steps in evolution lead to giant leaps in capability. Keep iterating!'
            ],
            '11.x' => [
                'changes' => 'Enhanced async capabilities, better error pages, and deeper MCP integration previews.',
                'inspiration' => 'With 11, see how persistence evolves ideas into reality—inspire others by sharing your journey!'
            ],
            '12.x' => [
                'changes' => 'Full MCP support, AI-native tools, and streamlined deployment with Laravel Reverb.',
                'inspiration' => '12.x shows evolution in action: From framework to AI ecosystem. What will you evolve next?'
            ],
        ];

        if (!array_key_exists($version, $evolutionData)) {
            return ['error' => 'Version not found. Try "9.x", "10.x", etc.'];
        }

        return $evolutionData[$version];
    }

    /**
     * Get the tool's input schema.
     *
     * @return array<string, \Illuminate\JsonSchema\JsonSchema>
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'version' => $schema->string()
                ->description('The Laravel version, e.g., "10.x" or "11.x".')
                ->required(),
        ];
    }
}
