# Lightweight PHP Benchmarking Library

A minimal, object-oriented benchmarking utility for measuring execution time of code blocks in PHP. Designed for profiling hot paths, repeated function calls, and rendering logic during development or runtime diagnostics.

  - 📏 Measure execution time across multiple calls;

  - 🧩 Scoped timing with `$benchmark->measure(fn() => ...)`;

  - 🔁 Fluent API with method chaining: `$benchmark->stop()->getTotal()`;

  - 🏷️ Label-based BenchmarkManager to organize multiple timers;

  - 🚫 No dependencies, zero config — drop-in ready;

Perfect for performance tuning without reaching for full profilers like Xdebug or Blackfire.
