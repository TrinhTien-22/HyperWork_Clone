<template>
  <div class="row">
    <div class="search_row_one">
      <input
        class="itemsearch"
        type="text"
        placeholder="Search Products Name"
      />
      <select class="itemsearch" name="  " id="">
        <option class="selected" value="" disabled selected>City</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <select class="itemsearch" name="" id="">
        <option class="selected" value="" disabled selected>Last Login</option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
    </div>
    <div class="search_row_two">
      <select class="itemsearch" name="" id="">
        <option class="selected" value="" disabled selected>
          Last Transition
        </option>
        <option value="1">1</option>
        <option value="2">2</option>
      </select>
      <button class="btn itemsearch_button">
        <span class="text_search">Search</span>
      </button>
    </div>
  </div>
</template>
<style>
.text_search {
  font-size: 16px;
  font-weight: 600;
}
.itemsearch option:first-child {
  font-style: italic;
  opacity: 0.5;
}
.search_row_one {
  display: flex;
  width: 100%;
}
.itemsearch {
  width: 30%;
  margin: 10px;
  padding: 12px;
  border: 1px solid rgba(227, 227, 227, 1);
  border-radius: 5px;
}
.itemsearch_button {
  width: 30%;
  margin: 10px;
  padding: 10px;
  border-radius: 5px;
  color: white;
  background-color: rgba(255, 89, 0, 1);
}
.itemsearch_button:hover {
  background-color: white;
  border: 1px solid rgba(255, 89, 0, 1);
  color: rgba(255, 89, 0, 1);
}
</style>
