<?php

use App\Mcp\Servers\EvolutionServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::web('/mcp/evolution', EvolutionServer::class);
