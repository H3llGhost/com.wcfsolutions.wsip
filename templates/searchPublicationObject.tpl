<div class="formElement">
	<div class="formFieldLabel">
		<label for="{@$publicationType}SearchCategories">{lang}wsip.search.categories{/lang}</label>
	</div>
	<div class="formField">
		<select id="{@$publicationType}SearchCategories" name="{@$publicationType}CategoryIDs[]" multiple="multiple" size="10">
			<option value="*"{if $selectAllCategories} selected="selected"{/if}>{lang}wsip.search.categories.all{/lang}</option>
			<option value="-">--------------------</option>
			{htmloptions options=$categoryOptions selected=$categoryIDs disableEncoding=true}
		</select>
	</div>
	<div class="formFieldDesc">
		<p>{lang}wcf.global.multiSelect{/lang}</p>
	</div>
</div>