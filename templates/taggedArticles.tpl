<div class="contentBox">
	<h3 class="subHeadline">{lang}wcf.tagging.taggable.com.wcfsolutions.wsip.article{/lang} <span>({#$items})</span></h3>
	
	{assign var='messageNumber' value=$items-$startIndex+1}
	{foreach from=$taggedObjects item=article}
		<div class="articleList">
			<div class="message">
				<div class="messageInner {cycle values='container-1,container-2'}">
					<div class="messageHeader">
						<p class="messageCount">
							<a href="index.php?page=Article&amp;sectionID={@$article->firstSectionID}{@SID_ARG_2ND}" title="{lang}wsip.article.permalink{/lang}" class="messageNumber">{#$messageNumber}</a>
						</p>
						<div class="containerIcon">
							<img src="{icon}articleM.png{/icon}" alt="" />	
						</div>
						<div class="containerContent">
							<h3><a href="index.php?page=Article&amp;sectionID={@$article->firstSectionID}{@SID_ARG_2ND}">{$article->subject}</a></h3>
							<p class="light smallFont">{lang}wsip.article.by{/lang} <a href="index.php?page=User&amp;userID={@$article->userID}{@SID_ARG_2ND}">{$article->username}</a> ({@$article->time|time})</p>
						</div>
					</div>
					<div class="messageBody">
						{@$article->getFormattedTeaser()}
					</div>
					
					<div class="messageFooter">
						<div class="smallButtons">
							<ul>
								<li class="extraButton"><a href="#top" title="{lang}wcf.global.scrollUp{/lang}"><img src="{icon}upS.png{/icon}" alt="" /> <span class="hidden">{lang}wcf.global.scrollUp{/lang}</span></a></li>
								<li><a href="index.php?page=Article&amp;sectionID={@$article->firstSectionID}{@SID_ARG_2ND}" title="{lang}wsip.article.more{/lang}"><img src="{icon}articleReadMoreS.png{/icon}" alt="" /> <span>{lang}wsip.article.more{/lang}</span></a></li>
							</ul>
						</div>
					</div>
					<hr />
				</div>
			</div>
		</div>
		{assign var='messageNumber' value=$messageNumber-1}
	{/foreach}
</div>