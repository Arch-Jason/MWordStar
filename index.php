<?php
/**
 * 这是一套简洁的博客主题
 *
 * @package MWordStar
 * @author Mr Ma
 * @version 0.1
 * @link https://www.misterma.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');  //  头文件
?>

<div class="container home">
    <div class="row">
        <div class="article-list col-md-12 col-lg-8 col-sm-12">
            <?php while ($this->next()):  //  开始循环  ?>
            <div class="post">
                <?php if ($this->fields->thumb): ?>
                <div class="header-img"
                ">
                <a href="<?php $this->permalink() ?>">
                    <img src="<?php $this->fields->thumb(); ?>" alt="<?php $this->title() ?>的头图">
                </a>
            </div>
        <?php endif; ?>
            <header class="entry-header">
                <h2 class="entry-title p-name">
                    <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h2>
            </header>
            <div class="entry-summary">
                <p><?php $this->excerpt($this->options->summary?$this->options->summary:150, '...'); ?></p>
                <p class="read-more">
                    <a class="btn read-more-btn" href="<?php $this->permalink() ?>">
                        阅读全文
                        <span></span>
                        <i class="icon-arrow-right"></i>
                    </a>
                </p>
            </div>
            <div class="article-info clearfix">
                <!--时间-->
                <div class="info">
                    <i class="icon-calendar icon" aria-label="日期图标"></i>
                    <span tabindex="0" title="发布时间"><?php $this->date('Y年m月d日'); ?></span>
                </div>
                <!--作者-->
                <div class="info">
                    <i class="icon-user icon" aria-label="作者图标"></i>
                    <a href="<?php $this->author->permalink(); ?>" title="作者"><?php $this->author(); ?></a>
                </div>
                <!--阅读量-->
                <div class="info">
                    <i class="icon-eye icon" aria-label="阅读图标"></i>
                    <span tabindex="0" title="阅读量"><?php echo getPostView($this); ?></span>
                </div>
                <!--评论-->
                <div class="info">
                    <i class="icon-bubbles2 icon" aria-label="评论图标"></i>
                    <a title="评论" href="#comments"><?php $this->commentsNum('%d 评论'); ?></a>
                </div>
                <!--分类-->
                <div class="info">
                    <i class="icon-folder-open icon" aria-label="分类图标"></i>
                    <?php $this->category(','); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <nav aria-label="分页导航区" class="pagination-nav">
            <?php $this->pageNav('&laquo;', '&raquo;', 2, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li', 'textTag' => 'a', 'currentClass' => 'active', 'prevClass' => 'prev', 'nextClass' => 'next')); ?>
        </nav>
    </div>
    <?php $this->need('sidebar.php'); ?>
</div>
</div>
<?php $this->need('footer.php'); ?>