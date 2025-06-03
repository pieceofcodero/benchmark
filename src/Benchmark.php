<?php

namespace Pieceofcodero\Benchmark;

class Benchmark
{
    /**
     * @var float Total measured time in seconds.
     */
    private $total = 0.0;

    /**
     * @var float Start time of current measurement.
     */
    private $startTime = 0.0;

    /**
     * @var bool Whether the timer is currently running.
     */
    private $running = false;

    /**
     * Pause the timer.
     *
     * If the timer is running, this method stops it and adds the elapsed time
     * to the total measured time.
     *
     * @return self
     */
    public function pause(): self
    {
        if ($this->running) {
            $this->total   += microtime(true) - $this->startTime;
            $this->running = false;
        }
        return $this;
    }

    /**
     * Stop the timer.
     *
     * This method is an alias for `pause()`. It stops the timer and adds the
     * elapsed time to the total measured time.
     *
     * @return self
     */
    public function stop(): self
    {
        return $this->pause();
    }

    /**
     * Start the timer.
     *
     * If the timer is already running, this method does nothing.
     *
     * @return self
     */
    public function start(): self
    {
        if (!$this->running) {
            $this->startTime = microtime(true);
            $this->running   = true;
        }
        return $this;
    }

    /**
     * Resume the timer.
     *
     * This method is an alias for `start()`. It starts the timer if it is not
     * already running.
     *
     * @return self
     */
    public function resume(): self
    {
        return $this->start();
    }

    /**
     * Reset the timer to its initial state.
     *
     * @return self
     */
    public function reset(): self
    {
        $this->total     = 0.0;
        $this->startTime = 0.0;
        $this->running   = false;
        return $this;
    }

    /**
     * Get the total measured time in seconds.
     *
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * Measure the time taken to execute a callable.
     *
     * @template T
     * @param callable(): T $callback
     *
     * @return T
     */
    public function measure(callable $callback)
    {
        $this->start();
        try {
            return $callback();
        } finally {
            $this->pause();
        }
    }
}
