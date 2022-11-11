import "./LegalNotice.css";

import { Breadcrumbs } from "@material-ui/core";
import { Link } from "react-router-dom";

function LegalNotice() {
  return (
    <section id="legal_notice">
      <Breadcrumbs className="breadcrumb" aria-label="breadcrumb">
        <Link to="/">Accueil</Link>
        <p>Mentions Légales</p>
      </Breadcrumbs>
      <div className="text_container">
        <h1>Mentions Légales</h1>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac
          rhoncus massa, in condimentum diam. Ut faucibus libero nec orci
          scelerisque malesuada. Donec nisl eros, maximus vel velit quis,
          dapibus molestie turpis. Donec eleifend semper bibendum. Ut vehicula
          arcu vitae mattis scelerisque. Praesent bibendum libero sem, quis
          efficitur sem bibendum laoreet. In pretium id nibh a maximus.
          Vestibulum vestibulum suscipit lorem, in fringilla massa. Morbi
          venenatis urna purus, sed sollicitudin nibh dapibus sed. Nullam lorem
          orci, dapibus a massa sit amet, auctor eleifend justo. Orci varius
          natoque penatibus et magnis dis parturient montes, nascetur ridiculus
          mus. Ut rhoncus augue purus, et cursus nibh rutrum a. Donec quis felis
          in enim auctor sagittis ac non tortor. Nam eget tristique ante. Duis
          tempus, nisl ac varius pulvinar, enim elit hendrerit justo, eget
          ultrices enim metus ac tellus. Class aptent taciti sociosqu ad litora
          torquent per conubia nostra, per inceptos himenaeos. Phasellus maximus
          justo lectus, id vestibulum lectus hendrerit a. Sed pretium neque quis
          lobortis ultricies. Ut tellus odio, egestas a egestas sit amet,
          pulvinar suscipit nisi. Cras facilisis non felis sit amet scelerisque.
          Quisque ultricies elementum lectus, vel gravida eros dignissim quis.
          Cras magna erat, sollicitudin vitae est at, molestie viverra lectus.
          Maecenas eleifend diam lacus, at maximus mi hendrerit non. Suspendisse
          potenti. Integer feugiat faucibus dolor, a sagittis elit viverra in.
          Nulla luctus aliquet felis vitae semper. Sed nec pharetra ex, eu
          scelerisque odio. Sed quis eros vel nibh volutpat lobortis. Nam at sem
          congue leo mattis fermentum. Vestibulum at magna vehicula, pharetra
          metus ac, posuere nunc. Morbi vel tempor urna. Sed quis tristique
          massa, eget malesuada nulla. Phasellus gravida dictum enim a
          hendrerit. Nam sit amet dui est. Duis congue vulputate ipsum, ut
          ullamcorper tellus auctor non. Aliquam luctus odio sit amet nisi
          lacinia, quis tempor odio feugiat. Orci varius natoque penatibus et
          magnis dis parturient montes, nascetur ridiculus mus. Nunc posuere
          felis metus, in sagittis tortor efficitur ac. Curabitur cursus ex
          felis, nec ullamcorper ligula iaculis at. Quisque consectetur, arcu
          sed venenatis tristique, eros magna pharetra sem, sit amet finibus
          lectus nibh vel augue. Nulla vitae ligula ex. Integer vestibulum
          cursus laoreet. Aliquam pellentesque magna lacus, ac euismod nisl
          convallis vitae. Suspendisse non lorem vulputate, aliquam magna et,
          mattis dui. Praesent diam elit, aliquet vel ultricies a, accumsan nec
          lorem. Pellentesque erat felis, dapibus eu risus in, pharetra aliquam
          arcu. Praesent at dolor nec risus auctor lacinia. Praesent finibus
          lorem diam, eget iaculis massa posuere quis. Nam feugiat in nisi non
          malesuada. Integer bibendum tempor sapien eget ullamcorper. Phasellus
          ut luctus eros, non finibus mi. Orci varius natoque penatibus et
          magnis dis parturient montes, nascetur ridiculus mus.
        </p>
      </div>
    </section>
  );
}

export default LegalNotice;
