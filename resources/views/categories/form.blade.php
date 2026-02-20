@csrf

<div>
    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Category Name <span
            class="text-red-500">*</span></label>
    <input type="text" id="name" name="name" required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
        placeholder="Enter category name" value="{{ old('name', $category->name ?? '') }}" />
    @error('name')
        <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
    <textarea id="description" name="description" rows="4"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
        placeholder="Enter category description">{{ old('description', $category->description ?? '') }}</textarea>
    @error('description')
        <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
    <select id="status" name="status"
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
        <option value="1" {{ (old('status', $category->status ?? '') == '1') ? 'selected' : '' }}>Active</option>
        <option value="0" {{ (old('status', $category->status ?? '') == '0') ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <p class="mt-1 text-xs text-red-500 font-medium">{{ $message }}</p>
    @enderror
</div>

<div class="flex items-center justify-end space-x-4 pt-4">
    <a href="{{ route('categories.index') }}"
        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-600 hover:text-gray-800 hover:border-gray-400 transition-all duration-200">
        Cancel
    </a>
    <button type="submit"
        class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-md">
        {{ isset($category) ? 'Update Category' : 'Create Category' }}
    </button>
</div>