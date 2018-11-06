<?php 

// search post
?>
<div class="formsearch-post-blog">
    <div class="container">
    <form action="/animators/" class="formsearch-post-wapper">
        
        <div class="formsearch-post-row">
            <div class="formsearch-post-item typeanimetor-box">
                <select name="typeanimetor" required>
					<option value="">検索項目</option>
                    <option value="アニメーター">アニメーター</option>
                    <option value="声優">声優</option> 
                </select>
            </div>
            
            <div class="disabled formsearch-post-item subtypeanimetor-box">
                <select name="subtypeanimetor" required>
					<option value="">検索項目</option> 
				</select>
            </div>
            
            <div class="disabled formsearch-post-item locationeanimetor-box">
                <select name="locationeanimetor" >
						<option value="">検索項目</option>
                        <option value="東京都23区">東京都23区</option>
					   <option value="東京都23区以外">東京都23区以外</option>
					   <option value="大阪府">大阪府</option>
					   <option value="北海道・東北エリア">北海道・東北エリア</option>
					   <option value="関東エリア">関東エリア</option>
					   <option value="中部エリア">中部エリア</option>
					   <option value="近畿エリア">近畿エリア</option>
					   <option value="中国・四国エリア">中国・四国エリア</option>
					   <option value="九州・沖縄エリア">九州・沖縄エリア</option>
                </select>
            </div>
            
            <div class="formsearch-post-item">
                <input type="text" name="search" placeholder="検索">
            </div> 
            <button class="search-button">Search</button>
        </div>
    </form> 
    </div>
</div>
