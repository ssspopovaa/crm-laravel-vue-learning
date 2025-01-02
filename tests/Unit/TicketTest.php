<?php

namespace Tests\Unit;

use App\Models\Ticket;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TicketTest extends TestCase
{
//    use RefreshDatabase;
    use DatabaseTransactions;

    public function testIsNew(): void
    {
//        $this->seed();
        $ticket = Ticket::factory()->create([
            'status' => 0,
        ]);

        $this->assertTrue($ticket->isNew());
    }

    public function testIsNotNew(): void
    {
//        $this->seed();
        $ticket = Ticket::factory()->create([
            'status' => 1,
        ]);

        $this->assertFalse($ticket->isNew());
    }
}
