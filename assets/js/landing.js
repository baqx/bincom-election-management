gsap.registerPlugin(ScrollTrigger);

// Header animation
gsap.from("header", {
  y: -100,
  opacity: 0,
  duration: 1,
  ease: "power3.out",
});

// Hero content animation
gsap.from(".hero-content > *", {
  y: 50,
  opacity: 0,
  duration: 1,
  stagger: 0.2,
  ease: "power3.out",
});

// Feature animations
gsap.from(".feature", {
  scrollTrigger: {
    trigger: ".features",
    start: "top 80%",
  },
  y: 100,
  opacity: 0,
  duration: 1,
  stagger: 0.2,
  ease: "power3.out",
});

// CTA animation
gsap.from(".cta > .container > *", {
  scrollTrigger: {
    trigger: ".cta",
    start: "top 80%",
  },
  y: 50,
  opacity: 0,
  duration: 1,
  stagger: 0.2,
  ease: "power3.out",
});

// Particle animation
function createParticle() {
  const particle = document.createElement("div");
  particle.classList.add("particle");
  particle.style.width = `${Math.random() * 10 + 5}px`;
  particle.style.height = particle.style.width;
  particle.style.background = `hsl(${Math.random() * 60 + 90}, 100%, 75%)`;
  particle.style.left = `${Math.random() * 100}vw`;
  particle.style.top = "100vh";

  document.body.appendChild(particle);

  gsap.to(particle, {
    y: -window.innerHeight - 100,
    duration: Math.random() * 2 + 3,
    ease: "none",
    onComplete: () => {
      particle.remove();
      createParticle();
    },
  });
}

for (let i = 0; i < 20; i++) {
  setTimeout(createParticle, i * 200);
}
