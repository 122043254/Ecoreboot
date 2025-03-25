@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-green-500 dark:border-green-500 dark:bg-white dark:text-gray-900 focus:border-green-600 dark:focus:border-green-700 focus:ring-green-500 dark:focus:ring-green-600 rounded-md shadow-sm']) }}>
