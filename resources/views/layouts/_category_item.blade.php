<!-- 如果当前类目有 children 字段并且 children 字段不为空 -->
@if(isset($category['children']) && count($category['children'])>0)
<li class="dropdown-submenu">
 <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('products.index',['category_id'=>$category['id']])}}">{{$category['name']}}</a>
<ul class="dropdown-menu">
    <!-- 遍历当前类目的子类目，递归调用自己这个模板 -->
    @each('layouts._category_item',$category['children'],'category')
</ul>     
</li>
@else
  <li>
  	<a href="{{route('products.index',['category_id'=>$category['id']])}}">{{$category['name']}}</a>
  </li>
@endif	