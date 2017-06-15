		<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="grid_footer">
					<div class="contenu_grid">
						<div class="footer_content">
							<ul>
								<li><a href="<?php echo site_url('saison') ?>">La saison</a></li>
								<li><a href="<?php echo site_url('saison') ?>?type=symphonique">Symphonique</a></li>
								<li><a href="<?php echo site_url('jeune-public') ?>">Jeune Public</a></li>
								<li><a href="<?php echo site_url('saison') ?>?type=musiq_de_chambre">Musique de chambre</a></li>
<!--								<li><a href="--><?php //echo site_url('') ?><!--">Artiste Invité</a></li>-->
								<li><a href="<?php echo site_url('orchestre-invite') ?>">OSB invité</a></li>
							</ul>
							<ul>
								<li>Action Culturelle</li>
								<li><a href="<?php echo site_url('concerts-scolaires') ?>">Scolaire</a></li>
								<li><a href="<?php echo site_url('venir-en-groupe') ?>">Venir en groupe</a></li>
								<li><a href="<?php echo site_url('les-poles') ?>">Les pôles</a></li>
<!--								<li><a href="--><?php //echo site_url('saison') ?><!--">Conférences / Concerts</a></li>-->
								<li><a href="<?php echo site_url('master-classes') ?>">Master Classes</a></li>
								<li><a href="<?php echo site_url('accessibilite') ?>">Accessibilité</a></li>

							</ul>
						</div>
						<div class="footer_content">
							<img src="<?php bloginfo('template_url') ?>/library/images/osb_logo.svg" alt="logo">
							<div id="reseaux_sociaux">
								<div><a href="###">Facebook</a></div>
								<div><a href="###">Twitter</a></div>
								<div><a href="###">Instagram</a></div>
							</div>
						</div>
						<div class="footer_content">
							<ul>
								<li>Nous soutenir</li>
								<li><a href="<?php echo site_url('mecenat-particulier') ?>">Concerto > Particuliers</a></li>

								<li><a href="<?php echo site_url('mecenat-pro') ?>">Symphonia > Entreprises</a></li>
								<li><a href="<?php echo site_url('don-en-ligne') ?>">Don en ligne</a></li>

							</ul>
							<ul>
								<li>Découvrir</li>
								<li><a href="<?php echo site_url('cote-orchestre') ?>">Côté Orchestre</a></li>
								<li><a href="<?php echo site_url('cote-pratique') ?>">Côté pratique</a></li>
								<li><a href="<?php echo site_url('cote-orga') ?>">Côté Organisation</a></li>
<!--								<li><a href="--><?php //echo site_url('historique') ?><!--">Historique</a></li>-->
							</ul>
						</div>
					</div>
					<div class="contenu_grid">
						<div class="contact_footer">
							ADMINISTRATION
							<ul>
								<li>42a, rue Saint Melaine</li>
								<li>BP 30823 // 35108 Rennes Cedex 3</li>
								<li><a href="tel:0299275285">tél : 33 (0) 2 99 27 52 85</a></li>
								<li>fax : 33 (0) 2 99 27 52 76</li>
								<li><a href="mailto:contact@o-s-b.fr">email : contact@o-s-b.fr</a></li>
							</ul>
						</div>
						<div class="billet">
							BILLETTERIE // Opéra de Rennes
							<ul>
								<li>Place de la Mairie</li>
								<li>35000 Rennes</li>
								<li>ouvert du mardi au samedi, de 13h à 18h</li>
								<li><a href="tel:0299275275">tél : 02 99 275 275</a></li>
							</ul>
						</div>
					</div>
					<div class="contenu_grid">
						<div class="mentions">
							<ul>
								<li><a href="<?php echo site_url('mentions-legales') ?>">Mention légales</a></li>
								<li>|</li>
								<li><a href="<?php echo site_url('mentions-legales') ?>">Crédits</a></li>

							</ul>
						</div>
					</div>
				</div>
		</footer>
		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
	</body>
</html> <!-- end of site. what a ride! -->
