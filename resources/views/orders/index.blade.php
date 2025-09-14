{{-- resources/views/orders/index.blade.php --}}
{{-- Simple, dependency-free page to preview orders in cards --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Minimal CSS only (no Bootstrap/Tailwind) --}}
    <style>
        :root {
            --bg: #f7f7fb;
            --ink: #222;
            --muted: #6b7280;
            --card-bg: #fff;
            --stroke: #e5e7eb;
            --accent: #0ea5e9; /* light blue for small highlights */
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif;
            color: var(--ink);
            background: var(--bg);
        }
        header {
            padding: 24px 16px;
            border-bottom: 1px solid var(--stroke);
            background: #fff;
        }
        .wrap {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 12px;
        }
        .title {
            display: flex;
            gap: 12px;
            align-items: center;
        }
        .title h1 {
            margin: 0;
            font-size: 24px;
            letter-spacing: 0.2px;
        }
        .grid {
            padding: 24px 0 48px;
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }
        .card {
            background: var(--card-bg);
            border: 1px solid var(--stroke);
            border-radius: 12px;
            padding: 16px;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
            box-shadow: 0 1px 0 rgba(0,0,0,0.02);
        }
        .card:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(0,0,0,0.05); }
        .row {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 6px 0;
        }
        .label {
            font-size: 12px;
            color: var(--muted);
            letter-spacing: 0.3px;
        }
        .value {
            font-size: 16px;
            font-weight: 600;
        }
        .empty {
            margin-top: 16px;
            color: var(--muted);
        }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #eff6ff;
            color: #1d4ed8;
            padding: 6px 10px;
            border-radius: 999px;
            border: 1px solid #dbeafe;
            font-size: 12px;
            font-weight: 600;
        }
        .sr-only { /* a11y helper */
            position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden;
            clip: rect(0,0,0,0); white-space: nowrap; border: 0;
        }
        /* Tiny inline icon styling */
        .icon { width: 18px; height: 18px; display: inline-block; }
        .icon path, .icon circle, .icon rect, .icon line { stroke: currentColor; }
        .headbar {
            display: flex; align-items: center; justify-content: space-between;
        }
    </style>
</head>
<body>
<header>
    <div class="wrap headbar">
        <div class="title">
            {{-- Inline SVG icon (document list) --}}
            <svg class="icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M8 7h8M8 12h8M8 17h5M4 5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5z" stroke-width="1.8" />
            </svg>
            <h1>Orders</h1>
        </div>

        {{-- Small status badge with count --}}
        <span class="badge" aria-label="Total Orders">
            {{-- Counter icon --}}
            <svg class="icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M3 12h18M12 3v18" stroke-width="1.8"/>
            </svg>
            {{ $orders->count() }} total
        </span>
    </div>
</header>

<main class="wrap">
    <section class="grid" aria-live="polite">
        @forelse ($orders as $order)
            <article class="card" aria-label="Order card">
                <div class="row">
                    {{-- Customer icon --}}
                    <svg class="icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke-width="1.8"/>
                        <path d="M4 21a8 8 0 0 1 16 0" stroke-width="1.8"/>
                    </svg>
                    <div>
                        <div class="label">Customer</div>
                        <div class="value">{{ $order->customer_name }}</div>
                    </div>
                </div>

                <div class="row">
                    {{-- Currency icon --}}
                    <svg class="icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 3v18M7 7.5h6.5a3.5 3.5 0 0 1 0 7H7" stroke-width="1.8" />
                    </svg>
                    <div>
                        <div class="label">Total</div>
                        <div class="value">${{ number_format((float) $order->total, 2) }}</div>
                    </div>
                </div>
            </article>
        @empty
            <p class="empty">No orders yet.</p>
        @endforelse
    </section>
</main>
</body>
</html>
