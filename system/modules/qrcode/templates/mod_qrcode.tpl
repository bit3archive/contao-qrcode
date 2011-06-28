
<!-- indexer::stop -->
<div class="<?php echo $this->class; ?> block"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>

<<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

<div class="image_container">
	<img src="<?php echo specialchars($this->qrcode); ?>" alt="<?php echo specialchars($this->alt); ?>" width="<?php echo $this->width; ?>" height="<?php echo $this->height; ?>" />
</div>

</div>
<!-- indexer::continue -->
