<?php

namespace Pieceofcodero\Benchmark;

class Manager
{
    /**
     * @var array Collection of benchmarks indexed by label.
     */
    private $benchmarks = [];

    /**
     * Get a Benchmark instance by label.
     *
     * If the benchmark does not exist, it creates a new one.
     *
     * @param string $label The label for the benchmark.
     * @return Benchmark The Benchmark instance.
     */
    public function get(string $label): Benchmark
    {
        if (!isset($this->benchmarks[$label])) {
            $this->benchmarks[$label] = new Benchmark();
        }
        return $this->benchmarks[$label];
    }

    /**
     * Simple report of all benchmarks.
     *
     * @return array
     */
    public function report(): array
    {
        return array_map(function (Benchmark $benchmark) {
            return sprintf(
                'Total: %.6f seconds, Count: %d',
                $benchmark->getTotal(),
                $benchmark->getCount()
            );
        }, $this->benchmarks);
    }
}
