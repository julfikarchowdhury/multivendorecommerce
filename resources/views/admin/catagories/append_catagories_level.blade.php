<div class="form-group">
    <label for="parent_id" >Catagory Level</label>
    <select name="parent_id" id="parent_id" class="form-control">
        <option  value="0" @if(isset($catagory['parent_id']) && $catagory['parent_id']==0) selected="
        " @endif>Main Catagory</option>
        @if(!empty($getCatagories))
         @foreach($getCatagories as $catagory)
           <option value="{{ $catagory['id'] }}" @if(isset($catagory['parent_id']) && 
           $catagory['parent_id']==$catagory['id']) selected="" @endif>
           {{ $catagory['catagory_name'] }}</option>
           @if(!empty($catagory['subcatagories']))
            @foreach($catagory['subcatagories'] as $subcatagory)
              <option value="{{ $subcatagory['id'] }}" @if(isset($catagory['parent_id']) && 
              $catagory['parent_id']==$subcatagory['id']) selected="" @endif>
              {{ $subcatagory['catagory_name'] }}</option>
            @endforeach
           @endif
         @endforeach
        @endif 
    </select>
</div>