<div class="flex mb-2">
    <div class="flex items-center me-4">
        <input name="updated" {{isset($updated) && $updated == 0 ? 'checked' : ''}} id="inline-radio" type="radio" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">新しい順</label>
    </div>
    <div class="flex items-center me-4">
        <input name="updated" value="1" {{isset($updated) && $updated == 1 ? 'checked' : ''}} id="inline-2-radio" type="radio" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-2-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">古い順</label>
    </div>
    <div class="flex items-center me-4">
        <input name="updated" value="2" {{isset($updated) && $updated == 2 ? 'checked' : ''}} id="inline-3-radio" type="radio" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
        <label for="inline-3-radio" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">人気順</label>
    </div>
</div>
